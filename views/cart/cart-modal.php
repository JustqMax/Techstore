<?php if(!empty($session['cart'])):?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Найменування </th>
                    <th>Кількість </th>
                    <th>Ціна</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item) :?>
                <tr>
                    <td class="cartimg"><?= \yii\helpers\Html::img($item['img'], ['alt'=>['name'], 'height'=>50, ])?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></td>
                </tr>
            <?php endforeach;?>
                <tr>
                    <td colspan="4">Разом: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">На суму: </td>
                    <td><?= $session['cart.sum']?> грн</td>
                </tr>

            </tbody>
        </table>
    </div>
<?php else:?>
    <h3>Кошик порожній </h3>
<?php endif;?>
