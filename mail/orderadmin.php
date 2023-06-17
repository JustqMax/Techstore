<div>
    <p>Добрий день, новий клієнт зробив замолвення.</p>
</div>
<div class="table-responsive">
    <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;">
        <thead>
        <tr style="background: #f9f9f9;">
            <th style="padding: 8px; border:1px solid #ddd;">Найменування </th>
            <th style="padding: 8px; border:1px solid #ddd;">Кількість </th>
            <th style="padding: 8px; border:1px solid #ddd;">Ціна</th>
            <th style="padding: 8px; border:1px solid #ddd;">Сума</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item) :?>
            <tr>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['name']?></td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['qty']?></td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['price']?></td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['qty'] * $item['price']?></td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="3" style="padding: 8px; border:1px solid #ddd;">Разом: </td>
            <td style="padding: 8px; border:1px solid #ddd;"><?= $session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px; border:1px solid #ddd;">На суму: </td>
            <td style="padding: 8px; border:1px solid #ddd;"><?= $session['cart.sum']?> грн</td>
        </tr>

        </tbody>
    </table>
</div>

<div>
    <p>Зателефонуйте за цим номером  <b><?= $order->phone?></b> , для підтвердження замовлення і адреси відправки (<?= $order->address?>).</p>
    <p> Ім'я клієнта <b><?= $order->surname?> <?= $order->name?></b>.</p>

</div>