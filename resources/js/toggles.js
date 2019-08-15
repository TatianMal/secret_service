document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn-del').addEventListener("click", function() {
        document.getElementById('confirm-del').classList.remove('hidden');
    });

    document.getElementById('cancel-delete').addEventListener("click", function() {
        document.getElementById('confirm-del').classList.add('hidden');
    });
});