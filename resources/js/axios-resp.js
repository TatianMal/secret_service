import axios from 'axios'

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('create-data').addEventListener("click", function() {

        let pass = document.getElementById('password').value;
        let content = document.getElementById('content').value;

        axios.post(createUrl,{
            password: pass,
            content: content
        }).then(function (response) {
            let url = indexUrl + '/' + response.data;
            let container = document.getElementById('create-container');
            let result = document.getElementById('saved-data');
            let link = document.getElementById('link');

            container.classList.add('hidden');
            result.classList.remove('hidden');
            link.setAttribute('href', url);
            link.innerText = url;

        }).catch(function (error) {
            if (error.response.status === 422) {
                let errors = error.response.data.errors;
                let list = document.getElementById('list-errors');
                list.innerHTML = '';
                list.classList.add('list-errors');

                for (let field in errors) {
                    let span = document.createElement('span');
                    span.classList.add('help-text', 'error');
                    span.innerText = errors[field][0];
                    list.append(span);
                }
            }

        });
    });
});


