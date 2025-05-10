<form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
    <fieldset>
        <div class="field lastname">
            <label for="last_name"><?= __trans('Nom'); ?><strong class="required"> *</strong></label>
            <input type="text" name="last_name" id="last_name" placeholder="Dupont" required
                <?php if (isset($_SESSION['old']['last_name'])): ?>
                    value="<?= $_SESSION['old']['last_name']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['last_name'])): ?>
                <p class="error"><?= $_SESSION['errors']['last_name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field firstname">
            <label for="first_name"><?= __trans('Prénom'); ?><strong class="required"> *</strong></label>
            <input type="text" name="first_name" id="first_name" placeholder="Jean" required
                <?php if (isset($_SESSION['old']['first_name'])): ?>
                    value="<?= $_SESSION['old']['first_name']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['first_name'])): ?>
                <p class="error"><?= $_SESSION['errors']['first_name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field email">
            <label for="email"><?= __trans('Adresse mail'); ?><strong class="required"> *</strong></label>
            <input type="text" name="email" id="email" placeholder="jean.dupont@gmail.com" required
                <?php if (isset($_SESSION['old']['email'])): ?>
                    value="<?= $_SESSION['old']['email']; ?>"
                <?php endif; ?>
            >
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <p class="error"><?= $_SESSION['errors']['email']; ?></p>
            <?php endif; ?>
        </div>

        <div class="field message">
            <label for="message"><?= __trans('Message'); ?><strong> *</strong></label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="<?= __trans('Je vous contacte pour...'); ?>" required><?php if (isset($_SESSION['old']['message'])): ?><?= $_SESSION['old']['message']; ?><?php endif; ?></textarea>
            <?php if (isset($_SESSION['errors']['message'])): ?>
                <p class="error"><?= $_SESSION['errors']['message']; ?></p>
            <?php endif; ?>
        </div>
    </fieldset>
    <input type="hidden" name="action" value="dw_submit_contact_form">
    <button type="submit" class="submit__btn">
        <?= __trans('Envoyer'); ?>
        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.8137 1.34314C12.8137 1.067 12.5899 0.84314 12.3137 0.84314H7.81371C7.53757 0.84314 7.31371 1.067 7.31371 1.34314C7.31371 1.61928 7.53757 1.84314 7.81371 1.84314H11.8137V5.84314C11.8137 6.11928 12.0376 6.34314 12.3137 6.34314C12.5899 6.34314 12.8137 6.11928 12.8137 5.84314V1.34314ZM1 12.6568L1.35355 13.0104L12.6673 1.69669L12.3137 1.34314L11.9602 0.989586L0.646447 12.3033L1 12.6568Z"/>
        </svg>
    </button>
</form>

<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;
