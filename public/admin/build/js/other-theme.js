document.addEventListener('DOMContentLoaded', function() {
    let RemoveButtons = document.querySelectorAll('.remove-item-form-btn');

    RemoveButtons.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            if(confirm("Are you sure you want to delete the item?")) {
                this.closest('form').submit();
            }
            return false;
        });
    });

    let SettingsEditButton = document.querySelectorAll('.settings-update-btn');

    SettingsEditButton.forEach(function(elem) {
        let settingSlug = elem.getAttribute('data-slug');
        elem.addEventListener('click', function(e) {
            e.preventDefault();
            let form = document.querySelector(settingSlug).submit();
        });
    });
});
