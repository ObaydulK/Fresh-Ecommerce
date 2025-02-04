@vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="px-2 py-8 max-w-xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center">
            <div class="text-gray-700 font-semibold text-lg">Fresh Ecommerce</div>
        </div>
        <div class="text-gray-700">
            <div class="font-bold text-xl mb-2 uppercase">Invoice</div>
            <div class="text-sm">{{$order->create_at}}</div>
            <div class="text-sm">Invoice #:</div>
        </div>
    </div>
    <div class="border-b-2 border-gray-300 pb-8 mb-8">
        <h2 class="text-2xl font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2"></div>
        <div class="text-gray-700 mb-2">{{$order->name}}</div>
        <div class="text-gray-700 mb-2">{{$order->email}}</div>
        <div class="text-gray-700">uttara, Dhaka</div>
    </div>
    <table class="w-full text-left mb-8">
        <thead>
        <tr>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Id</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Name</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Email</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Product_Title</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Quantity</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Price</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Payment</th>
            <th class="text-gray-700 font-bold uppercase  p-2 border">Deliver</th>
            <th class="text-gray-700 font-bold uppercase   p-2 border">Created</th>
        </tr> 
        </thead>
        <tbody>
        <tr>
            <td class="py-4 text-gray-700 p-2 border">{{$order->id}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->name}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->email}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->product_title}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->quantity}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->price}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->payment_status}}</td>
            <td class="py-4 text-gray-700 p-2 border">{{$order->delivery_status}}</td>
            <td class="py-4 text-gray-700 p-2 border-5">{{$order->created_at}}</td>
        </tr>
        </tbody>
    </table>
   
 
</div> 
 