<?php

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Staff;

it('completes a full order flow from category to payment', function () {
    // 1. Category болон Product үүсгэх
    $category = Category::create(['name' => 'Кофе']);
    $product = Product::create([
        'category_id' => $category->category_id,
        'name' => 'Латте',
        'price' => 8000,
        'is_available' => true,
    ]);

    // 2. Customer, Staff үүсгэх
    $customer = Customer::create([
        'name' => 'Бат',
        'phone' => '99001122',
        'email' => 'bat@test.mn',
    ]);
    $staff = Staff::create(['name' => 'Болд', 'role' => 'Barista']);

    // 3. Order үүсгэх
    $order = Order::create([
        'customer_id' => $customer->customer_id,
        'staff_id' => $staff->staff_id,
        'order_type' => 'dine-in',
        'status' => 'pending',
        'total_amount' => 8000,
    ]);

    // 4. Order Item үүсгэх (Order болон Product холбоно)
    $orderItem = OrderItem::create([
        'order_id' => $order->order_id,
        'product_id' => $product->product_id,
        'quantity' => 1,
        'unit_price' => $product->price,
        'subtotal' => $product->price,
    ]);

    // 5. Payment үүсгэх
    $payment = Payment::create([
        'order_id' => $order->order_id,
        'payment_method' => 'cash',
        'amount' => 8000,
        'status' => 'paid',
    ]);

    // Бүх холбоосыг шалгах
    expect($order->customer->name)->toBe('Бат');
    expect($order->staff->name)->toBe('Болд');
    expect($order->orderItems)->toHaveCount(1);
    expect($order->orderItems->first()->product->name)->toBe('Латте');
    expect($order->payments)->toHaveCount(1);
    expect($order->payments->first()->status)->toBe('paid');
    expect((float) $orderItem->subtotal)->toBe(8000.0);
});