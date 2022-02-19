<?php
require 'includes/header.php';
include 'includes/class/Model.php';

$model = new Model();
$fetch_datas = $model->affichageProduits();
?>
    <h1>Hello world</h1>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Categorie d'équipement</th>
        <th scope="col">Nom du produit</th>
        <th scope="col">Quantité en stock</th>
        <th scope="col">Références stock</th>
        <th scope="col">Prix unitaire H.T.</th>
        <th scope="col">Auteur</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($fetch_datas as $datas) : ?>
        <?php foreach ($datas as $data) : ?>
            <tr>
                <td><?php echo $data['categories_name']; ?>
                </td>
                <td><?php echo $data['products_name'];
                    if ($data['alert'] >= $data['quantity']) {
                        echo "<strong>
                <span class='icon-text has-text-danger'>
                    <span class='icon'>
                        <i class='fas fa-exclamation-triangle'></i>
                    </span>
                    <span>Stock faible</span>     
                </span>
            </strong>";
                    } ?>
                </td>
                <th class="is-warning">
                    <strong><?php echo $data['quantity']; ?>
                    </strong>
                </th>
                <td><?php echo $data['reference']; ?>
                </td>
                <td><?php echo $data['price']; ?>
                </td>
                <td><?php echo $data['username']; ?>
                </td>
                <td><a href="edit_products.php?id=<?php echo $data['products_id']; ?>"
                       class="btn btn-outline-danger"><i class="fas fa-pen"></i></a></td>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>


<?php require 'includes/footer.php'; ?>