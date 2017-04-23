import { files } from 'Classes/Files';

class Main {
    static get AJAX_USER_UPLOAD_FILE_URL() {
        return '/edit/imageUpload';
    }

    constructor() {
        this.tablePaginationAndSortInit();
        this.changeImage();
    }

    tablePaginationAndSortInit() {
        $('#main-table, #admin-table').dataTable( {
            "pageLength": 3,
            "lengthChange": false
        } );
    }

    changeImage() {
        $('.add-task').on('change', 'input[type=file]', (e) => {
            let file = $(e.currentTarget)[0].files[0],
                image = file.name,
                callback = (response) => {
                    let imagePath = `/images/${response.filename}`;
                    $('.add-task img').attr('src', imagePath);
                };

            this.filesUploadData = {
                file: file,
                callback: callback,
                url: Main.AJAX_USER_UPLOAD_FILE_URL
            };

            this.filesUpload();
        });
    }

    filesUpload() {
        if (this.filesUploadData.file) {
            files.upload(this.filesUploadData);
        }
    }
}

export let main = new Main();