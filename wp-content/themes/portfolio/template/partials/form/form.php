<form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
    <fieldset>
        <div class="field">
            <label for="last_name"><?= __trans('Nom'); ?><strong class="required"> *</strong></label>
            <input type="text" name="last_name" id="last_name" placeholder="Dupont" required
                <?php if (isset($_SESSION['old']['last_name'])): ?>
                    value="<?= $_SESSION['old']['last_name']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['last_name'])): ?>
                <p><?= $_SESSION['errors']['last_name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="first_name"><?= __trans('Prénom'); ?><strong class="required"> *</strong></label>
            <input type="text" name="first_name" id="first_name" placeholder="Jean" required
                <?php if (isset($_SESSION['old']['first_name'])): ?>
                    value="<?= $_SESSION['old']['first_name']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['first_name'])): ?>
                <p><?= $_SESSION['errors']['first_name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="email"><?= __trans('Adresse mail'); ?><strong class="required"> *</strong></label>
            <input type="text" name="email" id="email" placeholder="jeean.dupont@gmail.com" required
                <?php if (isset($_SESSION['old']['email'])): ?>
                    value="<?= $_SESSION['old']['email']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <p><?= $_SESSION['errors']['email']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="message"><?= __trans('Message'); ?><strong> *</strong></label>
            <textarea name="message" id="message" cols="30" rows="10"
                      placeholder="<?= __trans('Je vous contacte pour ...'); ?>" required>
                <?php if (isset($_SESSION['old']['message'])): ?>
                    <?= $_SESSION['old']['message']; ?>
                <?php endif; ?>
            </textarea>
            <?php if (isset($_SESSION['errors']['message'])): ?>
                <p><?= $_SESSION['errors']['message']; ?></p>
            <?php endif; ?>
        </div>
    </fieldset>
    <input type="hidden" name="action" value="dw_submit_contact_form">
    <button type="submit"><?= __trans('Envoyer'); ?></button>
</form>

<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;
