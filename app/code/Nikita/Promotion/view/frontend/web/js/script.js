define(function () {

    var submitFormBtn = document.querySelector('#formSubmit');
    var formInput = document.querySelector('.promotion__input input');

    function copyToClipboard(input) {
        input.select()
        document.execCommand('copy')
    }

    submitFormBtn.addEventListener('click', function (event) {
        event.preventDefault();

        let randomUrl = Math.random().toString(18).substr(1, 10)
        let reg = randomUrl.match('[a-zA-Z0-9]*$')
        formInput.value = `http://neekeetah.test/${reg.join('')}`;

        copyToClipboard(formInput);
    }, {once: true})

})