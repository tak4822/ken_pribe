$(function(){
    $('.long-text').each(function(){
        const string = $(this).text();
        const length = 200;
        if(string.length > length){
            const trimedStr =  string.substring(0, length - 3) + "...";
            $(this).text(trimedStr);
        }
    });

    //confirm delete
    $('.admin-delete').click(function(){
        return confirm('Are you sure to delete ' + $(this).data('title') + ' ?');
    })
});

//##################################
//          editor
//##################################

function editorFunc(){
    $('.about-link').popover({
        'trigger': 'hover',
        'title': 'Link',
        'content': function(){
            return $(this).attr('href')
        },
        'placement': 'top'
    });
    Array.prototype.map.call(document.querySelectorAll('.tools a:not([data-role="createLink"])'), (action) => {
        action.addEventListener("click", (e) => {
            e.preventDefault();
            document.execCommand(action.dataset.role, false, action.dataset.value);
        });
    });

    $('.editableContent').keydown(function(e) {
        console.log("hey");
        if (e.keyCode === 13) {
            document.execCommand('insertHTML', false, '<br><br>');
            return false;
        }
    });

    const anchorLink = document.querySelector('a[data-role="createLink"]');
    anchorLink.addEventListener('click', () => {
        const url = prompt('Enter the link here: ', 'https:\/\/');
        if(url){
            document.execCommand('createlink', false, url);
            const linkText = window.getSelection().focusNode.parentNode;
            $(linkText).addClass("about-link");
        } else {
            return false;
        }
    });

    const descInput = document.querySelector('.hidden-desc');
    const submitButton = document.querySelector('.submit-btn');
    if(submitButton) {
        submitButton.addEventListener('click', function(){
            const desc = document.querySelector('.editableContent').innerHTML;
            descInput.value = desc;
        });
    }

    const submitAboutButton = document.querySelector('.submit-btn-about');
    const aboutInput = document.querySelector('.hidden-about');
    const newsInput = document.querySelector('.hidden-news');
    if(submitAboutButton){
        submitAboutButton.addEventListener('click', function(){
            const about = document.querySelector('.editableContent.about').innerHTML;
            const news = document.querySelector('.editableContent.news').innerHTML;
            aboutInput.value = about;
            newsInput.value = news;
        });
    }

    //image upload
    $('.upload-btn').on('click', function(){
        $('#upload-input').click();

        $('.progress-bar').text('0%');
        $('.progress-bar').width('0%');
    });

    $('#upload-input').on('change', function(){
        const uploadInput = $('#upload-input');

        const formData = new FormData();
        formData.append('upload', uploadInput[0].files[0]);
        $.ajax({
            url: '/upload.php',
            type: 'POST',
            data: formData,
            processData: false, // important
            contentType: false, // important
            dataType : 'text',
            success: function(response){
                $('.upload-alert').append(response);
            },
            error: function(err){
                console.log(err);
            },

            xhr: function(){
                var xhr = new XMLHttpRequest();

                xhr.upload.addEventListener('progress', function(e){
                    if(e.lengthComputable){
                        var uploadPercent = e.loaded / e.total;
                        uploadPercent = (uploadPercent * 100);

                        $('.progress-bar').text(uploadPercent+'%');
                        $('.progress-bar').width(uploadPercent+'%');

                        if(uploadPercent === 100){
                            $('.progress-bar').text('Done');

                        }
                    }
                }, false);

                return xhr;
            }
        })

    });

}
