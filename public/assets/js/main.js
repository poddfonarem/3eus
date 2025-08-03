document.addEventListener("DOMContentLoaded", function () {

    //Alerts
    const alerts = document.querySelectorAll(".alert");
    alerts.forEach(function (alert) {
        setTimeout(function () {
            alert.style.transition = "height 0.3s ease, opacity 0.5s ease";
            alert.style.height = "0";
            alert.style.opacity = "0";

            setTimeout(function () {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }, 600);
        }, 2000);
    });

    // Developer Support Modal
    const alertEl = document.getElementById('myAlert');
    const showBtn = document.getElementById('showOrderBtn');
    const closeBtn = document.getElementById('closeBtn');

    function showAlert() {
        alertEl.classList.add('active');
    }

    function closeAlert() {
        alertEl.classList.remove('active');
    }

    showBtn.addEventListener('click', () => {
        showAlert();
    });

    closeBtn.addEventListener('click', closeAlert);

});