function alert(status, message, position1 = 'center') {
    if (status == 'success') {
        new Notify({
            status: 'success',
            title: 'Well Done!',
            text: message,
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: position1
        })
    } else if (status == 'error') {
        new Notify({
            status: 'error',
            title: 'Oops!',
            text: message,
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: position1
        })
    } else if (status == 'warning') {
        new Notify({
            status: 'warning',
            title: 'Warning!!',
            text: message,
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: position1
        })
    } else {
        new Notify({
            status: 'error',
            title: 'Information!',
            text: message,
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: position1
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var faqLinks = document.querySelectorAll('.faq__list-link');
    faqLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Önce tüm yanıtları gizle
            document.querySelectorAll('.faq__answer').forEach(function(answer) {
                answer.style.display = 'none';
            });

            // Şimdi sadece tıklanan bağlantının yanıtını göster
            var answer = this.nextElementSibling;
            answer.style.display = 'block';
        });
    });
});