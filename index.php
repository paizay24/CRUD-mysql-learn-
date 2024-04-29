<?php
$conn = mysqli_connect("localhost", "pzo", "pzo124", "wad_shop");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * from products";
$result = mysqli_query($conn, $sql);

// while($row = mysqli_fetch_assoc($result)){
//       print_r($row);
// }



?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="./output.css">
</head>

<body>
      <section class=" mx-w-[1000px] mx-auto">
            <h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-600 p-3">Creat Products</h1>
            <form action="./save.php" method="post" class=" bg-gray-200">
                  <div class=" grid grid-cols-3 gap-3 mt- p-3">
                        <div class=" col-span-1">
                              <input type="text" name="product" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="products">

                        </div>
                        <div class=" col-span-1">
                              <input type="number" name="price" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="price">

                        </div>
                        <div class=" col-span-1">
                              <input type="number" name="stock" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="stock">

                        </div>

                  </div>

                  <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Create Product
                  </button>


            </form>
            <div class="flex flex-col mt-3">
                  <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                              <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                          <thead>
                                                <tr>
                                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Product</th>
                                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Price</th>
                                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Stock</th>

                                                      <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                      <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $row['id'] ?></td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['name'] ?></td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['price'] ?>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['stock'] ?></td>

                                                            <div class=" flex">
                                                            <td>
                                                                  <a onclick="confirm('Are u sure wanna delete?')" href="./delete.php?row_id=<?= $row['id'] ?>" class="inline-flex items-center text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</a>
                                                            </td>
                                                            <td>
                                                                  <a href="./delete.php?row_id=<?= $row['id'] ?>" class="inline-flex items-center  text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Update</a>
                                                            </td>
                                                            </div>

                                                      </tr>
                                                <?php endwhile ?>


                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</body>

</html>