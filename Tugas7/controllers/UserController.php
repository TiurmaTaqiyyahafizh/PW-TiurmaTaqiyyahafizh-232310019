<?php
// controllers/UserController.php

class UserController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        $users = $this->userModel->findAll();
        $message = $_GET['message'] ?? ''; // Untuk pesan sukses/error
        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/users/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'] ?? '',
                'fullname' => $_POST['fullname'] ?? '',
                'address' => $_POST['address'] ?? '',
                'birthdate' => $_POST['birthdate'] ?? '',
                'gender' => $_POST['gender'] ?? '',
                'phone' => $_POST['phone'] ?? ''
            ];

            if ($this->userModel->create($data)) {
                header('Location: /pembelajaran-6/public/?message=User added successfully!');
                exit();
            } else {
                header('Location: /pembelajaran-6/public/create?message=Failed to add user.');
                exit();
            }
        }
    }

    public function edit($id) {
        $user = $this->userModel->findById($id);
        if (!$user) {
            header('Location: /pembelajaran-6/public/?message=User not found.');
            exit();
        }
        require_once __DIR__ . '/../views/users/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'] ?? '',
                'fullname' => $_POST['fullname'] ?? '',
                'address' => $_POST['address'] ?? '',
                'birthdate' => $_POST['birthdate'] ?? '',
                'gender' => $_POST['gender'] ?? '',
                'phone' => $_POST['phone'] ?? ''
            ];

            if ($this->userModel->update($id, $data)) {
                header('Location: /pembelajaran-6/public/?message=User updated successfully!');
                exit();
            } else {
                header('Location: /pembelajaran-6/public/edit/' . $id . '?message=Failed to update user.');
                exit();
            }
        }
    }

    public function destroy($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Gunakan POST untuk delete action
            if ($this->userModel->delete($id)) {
                header('Location: /pembelajaran-6/public/?message=User deleted successfully!');
                exit();
            } else {
                header('Location: /pembelajaran-6/public/?message=Failed to delete user.');
                exit();
            }
        }
    }
}