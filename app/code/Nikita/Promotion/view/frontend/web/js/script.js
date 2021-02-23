define(function () {

    var generateFormBtn = document.querySelector('#formGenerate');
    var copyFormBtn = document.querySelector('#formCopy');
    var formInput = document.querySelector('.promotion__input input');


    if (localStorage.getItem('link')) {
        formInput.value = localStorage.getItem('link')
        generateFormBtn.style.display = 'none'
        copyFormBtn.style.display = 'block'
    }

    function copyUniqueUrl() {
        formInput.select()
        document.execCommand('copy')
    }

    function generateUrl() {

        let randomUrl = Math.random().toString(18).substr(1, 10)
        let reg = randomUrl.match('[a-zA-Z0-9]*$')
        formInput.value = `http://neekeetah.test/${reg.join('')}`;

        localStorage.setItem('link', formInput.value)

        generateFormBtn.style.display = 'none'
        copyFormBtn.style.display = 'block'
    }

    copyFormBtn.addEventListener('click', copyUniqueUrl)
    generateFormBtn.addEventListener('click', generateUrl, {once: true})
})