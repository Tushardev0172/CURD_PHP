<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include_once("./config/db.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $sql = "INSERT INTO users (name, email, age) VALUES('$name','$email','$age')";
        if ($conn->query($sql)) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            title: 'Success!',
            text: 'User has been created successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php';
        });
        </script>
        ";
        } else {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            title: 'Error!',
            text: 'There was a problem creating the user.',
            icon: 'error',
            confirmButtonText: 'Try Again'
        });
        </script>
        ";
        }
    }

    ?>
    <div class="h-screen flex items-center justify-center bg-gray-50">
        <div class="w-full max-w-md border border-gray-400 p-6 rounded-xl shadow-lg bg-white">
            <h2 class="py-2 text-center font-semibold text-2xl text-indigo-600">Create User</h2>
            <form method="POST" class="flex flex-col gap-4">
                <input type="text" name="name" placeholder="Name"
                    class="p-2 rounded border border-gray-300 shadow-sm sm:text-sm" required>

                <input type="email" name="email" placeholder="Email"
                    class="p-2 rounded border border-gray-300 shadow-sm sm:text-sm" required>

                <input type="number" name="age" placeholder="Age" min="0"
                    class="p-2 rounded border border-gray-300 shadow-sm sm:text-sm" required>

                <div class="flex gap-2">
                    <button type="submit" name="submit"
                        class="w-full rounded-md border border-indigo-600 px-6 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white">
                        Create
                    </button>

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