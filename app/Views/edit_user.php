<div class="container mt-4">
    <h2>Edit User</h2>
    <form action="<?= base_url('home/updateUser/'.$user->id_user) ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="" disabled>Select Level</option>
                <option value="1" <?= $user->level == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $user->level == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $user->level == 3 ? 'selected' : '' ?>>3</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
         <input type="text" class="form-control" id="password" name="password" value="<?= $user->password ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('home/user') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
