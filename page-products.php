<?php
/* Template Name: Products Page */
get_header(); ?>

<div class="container my-4">
    <h2>Our Products</h2>

    <!-- Dropdown filtre -->
    <select id="product-category-filter" class="form-select w-50">
        <option value="">All Categories</option>
        <?php
        $terms = get_terms(array('taxonomy' => 'product_category', 'hide_empty' => false));
        foreach ($terms as $term) {
            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        ?>
    </select>

    <div id="product-list" class="row mt-4">
        <!-- Ürünler buraya gelecek -->
    </div>
</div>

<script>
document.getElementById('product-category-filter').addEventListener('change', function () {
    var cat = this.value;
    var data = new FormData();
    data.append('action', 'filter_products');
    data.append('category', cat);

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: data
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById('product-list').innerHTML = data;
    });
});
</script>

<?php get_footer(); ?>
