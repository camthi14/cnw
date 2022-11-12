<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($params['title']) ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5 ">
                <form action="<?= BASE_URL . '/admin/login' ?>" method="post">
                    <h1 class="text-center mb-3 mt-5">Đăng nhập hệ thống</h1>

                    <?php if(isset($params['error']) && !empty($params['error'])): ?>
                        <div class="alert alert-danger"><?= $params['error'] ?></div>
                    <?php endif ?>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Tài khoản</label>
                        <input
                            type="text"
                            id="form2Example1"
                            name="username"
                            value="<?= isset($params['data']['username']) ? $params['data']['username'] : '' ?>"
                            class="form-control"
                        />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Mật khẩu</label>
                        <input
                            type="password"
                            name="password"
                            id="form2Example2"
                            value="<?= isset($params['data']['password']) ? $params['data']['password'] : '' ?>"
                            class="form-control"
                        />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Xác nhận</button>

                </form>
            </div>
        </div>
    </div>
</body>

<!-- LIBRARY JS-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</body>

</html>