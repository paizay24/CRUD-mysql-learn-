<?php
require_once("./schooldb_conn.php");
?>
<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>


<hr>

<section class=" max-w-[1000px] mx-auto bg-gray-100">
      <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                        Manage Batches
                  </a>

            </li>


      </ol>
      <h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-200 p-2">Create Batch</h1>
      <form action="./batch-save.php" method="post" class=" bg-gray-200">
            <div class=" grid grid-cols-2 gap-3  p-3">
                  <div class=" col-span-1">
                        <input type="text" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Batch Name">

                  </div>
                  <div class=" col-span-1">
                        <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="courseId">
                              <option selected="">Choose Course</option>
                              <?php
                              $sqll = "SELECT * FROM courses";
                              $query = mysqli_query($conn, $sqll);

                              ?>
                              <?php while ($option = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?= $option['id'] ?>"><?= $option['title'] ?></option>

                              <?php endwhile ?>
                        </select>

                  </div>
                  <div class=" col-span-1">
                        <input type="date" name="date" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                  </div>
                  <div class=" col-span-1">
                        <input type="time" name="time" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                  </div>
                  <div class=" col-span-2">
                        <input type="number" name="limit" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="student limit">

                  </div>
                  <div class="py-5">
                        <div class="flex">
                              <input type="checkbox" name="is_register_open" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox" value="1" checked>
                              <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                    Register Open
                              </label>
                        </div>
                  </div>


            </div>

            <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Create Batch
            </button>


      </form>
      <h1 class=" font-serif font-semibold text-center text-2xl text-decoration-underline ">Batch Lists</h1>
      <div class="flex flex-col mt-3">
            <div class="m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                          <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Course </th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Start Date</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Start Time</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Register</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Student Limit</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Created at</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Updated at</th>

                                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php

                                          $sql = "SELECT 
                                          *,
                                          batches.id AS batch_id
                                      FROM 
                                          `batches`
                                      LEFT JOIN 
                                          `courses` ON `courses`.`id` = `batches`.`course_id`;
                                      ";
                                          $result = mysqli_query($conn, $sql);
                                          $row = mysqli_fetch_assoc($result);


                                          ?>
                                          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">

                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $row['batch_id'] ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['name'] ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200" title="<?= $row['title'] ?>"><?= $row['short'] ?>
                                                      </td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y', strtotime($row['start_date'])) ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('h A', strtotime($row['start_time']))  ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"> <?php if ($row['is_register_open']) : ?>
                                                                  <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Open</span>


                                                            <?php else :  ?>
                                                                  <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">Close</span>

                                                            <?php endif ?>
                                                      </td>


                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['student_limit'] ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y || h:i:s', strtotime($row['created_at']))  ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y || h:i:s', strtotime($row['updated_at']))  ?></td>

                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-end text-gray-800 dark:text-neutral-200">
                                                            <div class="inline-flex rounded-lg shadow-sm">


                                                                  <a onclick="confirm('Are u sure wanna delete?')" href="./batch-delete.php?row_id=<?= $row['batch_id'] ?>" class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:text-red-700">
                                                                              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                        </svg>
                                                                  </a>


                                                                  <a href="./batch-edit.php?row_id=<?= $row['batch_id'] ?>" class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                                        </svg>
                                                                  </a>

                                                            </div>
                                                      </td>



                                                </tr>
                                          <?php endwhile ?>


                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</section>



<?php require_once('./template/footer.php') ?>