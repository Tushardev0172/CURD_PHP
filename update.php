<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include_once("./config/db.php");

    $id = $_GET['id'];

    $user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        if ($conn->query("UPDATE users SET name='$name', email='$email', age='$age' WHERE id=$id")) {
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Updated!',
                        text: 'User has been updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });
            </script>
            ";
        } else {
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong while updating.',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                });
            </script>
            ";
        }
    }
    ?>

    <div class="h-screen flex items-center justify-center bg-gray-50">
        <div class="w-full max-w-md border border-gray-400 p-6 rounded-xl shadow-lg bg-white">
            <h2 class="py-2 text-center font-semibold text-2xl text-indigo-600">Update User</h2>
            <form method="POST" class="flex flex-col gap-4">
                <input type="text" name="name" value="<?php echo $user['name']; ?>" class="p-2 mt-0.5 w-full rounded border border-gray-300  shadow-sm sm:text-sm" required>

                <input type="email" name="email" value="<?php echo $user['email']; ?>" class="p-2 w-full rounded border border-gray-300 shadow-sm sm:text-sm" required>

                <input type="number" name="age" value="<?php echo $user['age']; ?>" class="p-2 w-full rounded border border-gray-300 shadow-sm sm:text-sm" required>

                <div class="flex gap-2">
                    <button type="submit" name="update" class='w-full rounded-md border border-indigo-600 px-6 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white'>Update</button>

                    <a href="index.php"
                        class="w-full rounded-md border border-indigo-600 px-6 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>