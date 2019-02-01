{{-- Template mail for an order validation --}}

<h3>Bonjour {{$name}}, </h3>
<p>Votre commande n°{{$orderID}} a bien été prise en compte.</p>
<p> Récapitulatif :</p>

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

<p>Merci pour votre achat.</p>
<p>Cordialement,</p>
<p>Le BDE du CESI</p>