document.addEventListener("DOMContentLoaded", () => {
	const postData =
		{
			title: 'New Post',
			shortDescription: 'Please, enter any description',
			authorName: 'Enter author name',
            authorPhoto: '',
            publishDate: '19/05/2024',
			heroImage: '',
		}

	const titleInput = document.getElementById('title_input');
	const shortDescription = document.getElementById('Short_description');
    const authorName = document.getElementById('Author_name');
    const authorPhoto = document.getElementById('Author_Photo');
	const publishDate = document.getElementById('Publish_Date');
	const heroImage = document.getElementById('Hero_Image');

    function onTitleInputChange(event) {
		postData.title = event.target.value;
		invalidatePostPreview()
	}
    function onShortDescriptionChange(event) {
        postData.shortDescription = event.target.value;
        invalidatePostPreview()
    }
    function onAuthorNameChange(event) {
		postData.authorName = event.target.value;
		invalidatePostPreview()
	}
	function onAuthorPhotoChange(event) {
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.authorPhoto = result;
			invalidatePostPreview()
		});
	}
    function onPublishDateChange(event) {
        postData.publishDate = event.target.value;
        invalidatePostPreview()
    }
	function onHeroImageInputChange(event) {
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.heroImage = result;
			invalidatePostPreview()
		});
	}

    function readFileAsBase64 (file, onload) {
		const reader = new FileReader();
		reader.addEventListener( "load", () => {
			onload(reader.result);
		}, false, );
		reader.readAsDataURL(file);
	}

    function initEventListener () {
		titleInput.addEventListener('input', onTitleInputChange);
		shortDescription.addEventListener('input', onShortDescriptionChange);
		authorName.addEventListener('input', onAuthorNameChange);
        authorPhoto.addEventListener('change', onAuthorPhotoChange);
        publishDate.addEventListener('input', onPublishDateChange);
		heroImage.addEventListener('change', onHeroImageInputChange);
	}

    function invalidatePostPreview () {
		const postPreviewTitle = document.querySelector('.preview__title')
		postPreviewTitle.innerText = postData.title;

        const cardPreviewTitle = document.querySelector('.main-info__title')
        cardPreviewTitle.innerText = postData.title;

        const cardPreviewShortDescription = document.querySelector('.main-info__Short_description')
        cardPreviewShortDescription.innerText = postData.shortDescription;

		const postPreviewShortDescription = document.querySelector('.preview__Short_description')
		postPreviewShortDescription.innerText = postData.shortDescription;

		const postPreviewAuthorName = document.querySelector('.author__Author_name')
		postPreviewAuthorName.innerText = postData.authorName;

        const postPreviewAuthorPhoto = document.querySelector('.author__Author_Photo')
        postPreviewAuthorPhoto.style.backgroundImage = `url(${postData.authorPhoto})`;

        const postPreviewPublishDate = document.querySelector('.block_author-data__Publish_Date')
        postPreviewPublishDate.innerText = postData.publishDate;

		const postPreviewHeroImage = document.querySelector('.preview__Hero_Image')
		postPreviewHeroImage.style.backgroundImage = `url(${postData.heroImage})`

        const cardPreviewHeroImage = document.querySelector('.card-preview__Hero_Image')
		cardPreviewHeroImage.style.backgroundImage = `url(${postData.heroImage})`
	}


	initEventListener();
});