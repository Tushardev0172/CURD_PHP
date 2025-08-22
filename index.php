<hr>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD APP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
</head>

<body>

    <?php

    include_once("./config/db.php");

    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $totalRecords = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
    $totalPages = ceil($totalRecords / $limit);

    $result = $conn->query("SELECT * FROM users LIMIT $limit OFFSET $offset");

    echo "<div class='max-w-full mx-auto px-4 py-4'>";
    echo "<h1 class='text-[2.5rem] text-center text-indigo-600 font-semibold'>User List</h1>";

    echo "<div class='rounded border border-gray-300 shadow-sm mt-8 overflow-x-auto'>";


    echo "<table border='1' class='min-w-full divide-y-2 divide-gray-200>";
    echo "<thead>
    <tr class='*:font-medium *:text-gray-900'>
    <th class='px-3 py-2 whitespace-nowrap'>S.No</th>
    <th class='px-3 py-2 whitespace-nowrap'>Name</th>
    <th class='px-3 py-2 whitespace-nowrap'>Email</th>
    <th class='px-3 py-2 whitespace-nowrap'>Age</th>
    <th class='px-3 py-2 whitespace-nowrap'>Action</th>
    </tr> </thead>";
    $serial = $offset + 1;
    echo "<tbody class='divide-y divide-gray-200 text-center'>";
    foreach ($result as $r) {
        echo "<tr>
            <td class='px-3 py-2 whitespace-nowrap'>" . $serial++ . "</td>
            <td class='text-gray-900 px-3 py-2 whitespace-nowrap'>" . $r['name'] . "</td>
            <td class='text-gray-700 px-3 py-2 whitespace-nowrap'>" . $r['email'] . "</td>
            <td class='text-gray-700 px-3 py-2 whitespace-nowrap'>" . $r['age'] . "</td>
            <td class='px-3 py-2 whitespace-nowrap'>
              <div class='inline-flex'>
                <a href='update.php?id=" . $r["id"] . "'
                   class='rounded-l-md border border-indigo-600 px-3 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white'>Edit</a>
                <a href='delete.php?id=" . $r["id"] . "'
                onclick='event.preventDefault(); confirmDelete(this.href)'
                   class='rounded-r-md border border-indigo-600 px-3 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white'>Delete</a>
              </div>
            </td>
          </tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";




    echo "<div class='flex justify-center space-x-2 mt-4'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = $i == $page ? "bg-indigo-600 text-white" : "bg-white text-indigo-600";
        echo "<a href='?page=$i' class='px-3 py-1 border border-indigo-600 rounded $active hover:bg-indigo-600 hover:text-white'>$i</a>";
    }
    echo "</div>";

    echo "<div class=''>
          <a href='create.php' class='inline-block rounded-md border border-indigo-600 px-6 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white'>Create User</a>
        </div>";

    echo "</div>";


    echo "</div>";
    ?>
</body>

</html>