<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>


<hr>
<h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-200 p-3">Edit Product</h1>
<?php $id = $_GET['row_id'];

$sql = "SELECT * FROM products WHERE id = $id";

$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query); ?>

<section class=" max-w-[1000px] mx-auto bg-gray-100">
      <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./product-create.php">
                        Products
                  </a>
                  <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                  </svg>

            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./product-edit.php">
                        Product Edit
                  </a>


            </li>


      </ol>
      <form action="./product-update.php" method="post" class=" bg-gray-200">
            <div class=" grid grid-cols-3 gap-3 p-3">
                  <input type="hidden" value="<?= $row['id'] ?>" name="id">
                  <div class=" col-span-1">
                        <input type="text" name="name" value="<?= $row["name"] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="products">

                  </div>
                  <div class=" col-span-1">
                        <input type="number" name="price" value="<?= $row['price'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="price">

                  </div>
                  <div class=" col-span-1">
                        <input type="number" name="stock" value="<?= $row['stock'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="stock">

                  </div>

            </div>

            <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Edit Product
            </button>


      </form>
      <?php require_once('./template/footer.php') ?>