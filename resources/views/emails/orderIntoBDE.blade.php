{{-- BDE notification for an order --}}

<h3>L'étudiant {{$name}} a passé la commande {{$orderID}}</h3>
<h4>E-mail : {{$email}}</h4>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_cart as $contain)
        <tr>
          <th style="text-align: left">{{$contain->goodie->name}}</th>
          <td style="text-align: left">{{$contain->quantity}}</td>
          <td style="text-align: left">{{$contain->quantity*$contain->goodie->price}} €</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <th>Total :</th>
            <th>{{App\Models\Site\Order::totalOrderCost($orderID)}} €</th>
        </tr>
    </tfoot>
</table>
