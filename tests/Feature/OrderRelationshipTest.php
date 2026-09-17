<?php

use App\Models\Customer;
use App\Models\Order;
use App\Models\Staff;

it('order belongs to a customer', function () {
    $customer = Customer::create([
        'name' => 'Test Customer',
        'phone' => '99001122',
        'email' => 'test@example.com',
    ]);

    $order = Order::create([
        'customer_id' => $customer->customer_id,
        'order_type' => 'dine-in',
        'status' => 'pending',
        'total_amount' => 5000,
    ]);

    expect($order->customer->customer_id)->toBe($customer->customer_id);
    expect($order->customer->name)->toBe('Test Customer');
});

it('order can have a staff member', function () {
    $staff = Staff::create([
        'name' => 'Test Staff',
        'role' => 'Barista',
    ]);

    $customer = Customer::create([
        'name' => 'Another Customer',
        'phone' => '88112233',
        'email' => 'another@example.com',
    ]);

    $order = Order::create([
        'customer_id' => $customer->customer_id,
        'staff_id' => $staff->staff_id,
        'order_type' => 'takeaway',
        'status' => 'pending',
        'total_amount' => 3000,
    ]);

    expect($order->staff->staff_id)->toBe($staff->staff_id);
});