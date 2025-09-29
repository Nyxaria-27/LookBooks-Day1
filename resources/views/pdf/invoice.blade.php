<h2>Invoice Order #{{ $order->id }}</h2>
<p><strong>User:</strong> {{ $order->user->name }}</p>
<p><strong>Email:</strong> {{ $order->user->email }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
<p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Book</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->book->title }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp {{ number_format($item->price,0,',','.') }}</td>
            <td>Rp {{ number_format($item->price * $item->quantity,0,',','.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Total: Rp {{ number_format($order->total_price,0,',','.') }}</h3>