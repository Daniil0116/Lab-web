document.addEventListener("DOMContentLoaded", () => {
	const postData =
	{
		title: 'New Post',
		shortDescription: 'Please, enter any description',
		authorName: 'Enter author name',
		authorPhoto: '',
		publishDate: 'гггг-мм-дд',
		heroImage: '',
		content: '',
	}

	const titleInput = document.getElementById('title_input');
	const shortDescription = document.getElementById('Short_description');
	const authorName = document.getElementById('Author_name');
	const authorPhoto = document.getElementById('Author_Photo');
	const publishDate = document.getElementById('Publish_Date');
	const heroImage = document.getElementById('Hero_Image');
	const content = document.getElementById('input_content');

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
	function onContent(event) {
		postData.content = event.target.value;
		invalidatePostPreview()
	}

	function readFileAsBase64(file, onload) {
		const reader = new FileReader();
		reader.addEventListener("load", () => {
			onload(reader.result);
		}, false,);
		reader.readAsDataURL(file);
	}

	function initEventListener() {
		titleInput.addEventListener('input', onTitleInputChange);
		shortDescription.addEventListener('input', onShortDescriptionChange);
		authorName.addEventListener('input', onAuthorNameChange);
		authorPhoto.addEventListener('change', onAuthorPhotoChange);
		publishDate.addEventListener('input', onPublishDateChange);
		heroImage.addEventListener('change', onHeroImageInputChange);
		content.addEventListener('input', onContent);
	}

	function invalidatePostPreview() {
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

	document.getElementById('add_post').addEventListener('submit', InputError);

	function InputError(event) {
		event.preventDefault()

		var fail_title = true;
		var fail_shortDescription = true;
		var fail_authorName = true;
		var fail_authorPhoto = true;
		var fail_publishDate = true;
		var fail_heroImage = true;
		var fail_content = true;

		if (postData.title == '' || postData.title == 'New Post') {
			fail_title = true;
			document.getElementById('title_input_error').innerHTML = 'Title is required.';
			document.getElementById('title_input').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_title = false;
			document.getElementById('title_input_error').innerHTML = '';
			document.getElementById('title_input').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.shortDescription == '' || postData.shortDescription == 'Please, enter any description') {
			fail_shortDescription = true;
			document.getElementById('Short_description_error').innerHTML = 'Short description is required.';
			document.getElementById('Short_description').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_shortDescription = false;
			document.getElementById('Short_description_error').innerHTML = '';
			document.getElementById('Short_description').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.authorName == '' || postData.authorName == 'Enter author name') {
			fail_authorName = true;
			document.getElementById('Author_name_error').innerHTML = 'Author name is required.';
			document.getElementById('Author_name').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_authorName = false;
			document.getElementById('Author_name_error').innerHTML = '';
			document.getElementById('Author_name').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.authorPhoto == '') {
			fail_authorPhoto = true;
			document.getElementById('Author_Photo_error').style.display = 'block';
			document.getElementById('Author_Photo_error').innerHTML = 'Author photo is required.';
			document.getElementById('input_author-photo').style.borderColor = 'rgba(232, 105, 97, 1)';
			document.getElementById('author-photo').style.marginBottom = '5px';
		} else {
			fail_authorPhoto = false;
			document.getElementById('Author_Photo_error').innerHTML = '';
			document.getElementById('input_author-photo').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (postData.publishDate == '' || postData.publishDate == 'гггг-мм-дд') {
			fail_publishDate = true;
			document.getElementById('Publish_Date_error').innerHTML = 'Publish date is required.';
			document.getElementById('Publish_Date').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_publishDate = false;
			document.getElementById('Publish_Date_error').innerHTML = '';
			document.getElementById('Publish_Date').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.heroImage == '') {
			fail_heroImage = true;
			document.getElementById('input_hero-image1_error').style.display = 'block';
			document.getElementById('input_hero-image1_error').innerHTML = 'Hero image is required.';
			document.getElementById('input_hero-image1').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_heroImage = false;
			document.getElementById('input_hero-image1_error').innerHTML = '';
			document.getElementById('input_hero-image1').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (postData.heroImage == '') {
			fail_heroImage = true;
			document.getElementById('input_hero-image2_error').style.display = 'block';
			document.getElementById('input_hero-image2_error').innerHTML = 'Hero image is required.';
			document.getElementById('input_hero-image2').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_heroImage = false;
			document.getElementById('input_hero-image2_error').innerHTML = '';
			document.getElementById('input_hero-image2').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (postData.content == '') {
			fail_content = true;
			document.getElementById('input_content_error').innerHTML = 'Content is required.';
			document.getElementById('input_content').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_content = false;
			document.getElementById('input_content_error').innerHTML = '';
			document.getElementById('input_content').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (fail_title == true || fail_shortDescription == true || fail_authorName == true || fail_authorPhoto == true || fail_publishDate == true || fail_heroImage == true || fail_content == true) {
			document.getElementById('publish_message-error').style.display = 'flex';
			document.getElementById('publish_message-complete').style.display = 'none';
		} else {
			document.getElementById('publish_message-error').style.display = 'none';
			document.getElementById('publish_message-complete').style.display = 'flex';
			console.log(postData.title)
			console.log(postData.shortDescription)
			console.log(postData.authorName)
			console.log(postData.authorPhoto)
			console.log(postData.publishDate)
			console.log(postData.heroImage)
			console.log(postData.content)
		}

	}

	document.getElementById('Author_Photo').onchange = function () {
		var src = URL.createObjectURL(this.files[0])
		document.getElementById('author-photo__preview').src = src
		document.getElementById('author-photo__preview').style.display = 'flex'
		document.getElementById('input_author-photo').style.justifyContent = 'normal'
		document.getElementById('input_author-photo').style.borderStyle = 'none'
		document.getElementById('upload__text').style.display = 'block'
		document.getElementById('input__upload').style.marginLeft = '10px'
		document.getElementById('delete_authorPhoto').style.display = 'flex'
		document.getElementById('Author_Photo_error').style.display = 'none'
		document.getElementById('author-photo').style.marginBottom = '30px'
	}


	document.getElementById('delete_authorPhoto').addEventListener('click', deleteAuthor);
	function deleteAuthor(event) {
		event.preventDefault()
		document.getElementById('author-photo__preview').src = ''
		document.getElementById('author-photo__preview').style.display = 'none'
		document.getElementById('upload__text').style.display = 'none'
		document.getElementById('input_author-photo').style.borderStyle = 'flex'
		document.getElementById('delete_authorPhoto').style.display = 'none'
		document.getElementById('input_author-photo').style.borderStyle = 'dashed'
		document.getElementById('input_author-photo').style.justifyContent = 'center'
		document.getElementById('input__upload').style.marginLeft = '0px'
		document.querySelector('.author__Author_Photo').style.backgroundImage = ''
		postData.authorPhoto = '';
	}

	document.getElementById('Hero_Image').onchange = function () {
		var src = URL.createObjectURL(this.files[0])
		document.getElementById('input_hero-image1__preview').src = src
		document.getElementById('input_hero-image1__preview').style.display = 'flex'
		document.getElementById('input_hero-image1').style.border = 'none'
		document.getElementById('input_hero-image1').style.justifyContent = 'normal'
		document.getElementById('input_hero-image1').style.alignItems = 'normal'
		document.getElementById('input_hero-image1').style.maxWidth = '122px'
		document.getElementById('input_hero-image1').style.maxHeight = '24px'
		document.getElementById('input_hero-image1').style.backgroundColor = 'rgba(255, 255, 255, 1)'
		document.getElementById('input_hero-image1').style.marginBottom = '25px'
		document.getElementById('input_hero-image2__preview').src = src
		document.getElementById('input_hero-image2__preview').style.display = 'flex'
		document.getElementById('input_hero-image2').style.border = 'none'
		document.getElementById('input_hero-image2').style.justifyContent = 'normal'
		document.getElementById('input_hero-image2').style.alignItems = 'normal'
		document.getElementById('input_hero-image2').style.maxWidth = '122px'
		document.getElementById('input_hero-image2').style.maxHeight = '24px'
		document.getElementById('input_hero-image2').style.backgroundColor = 'rgba(255, 255, 255, 1)'
		document.getElementById('input_hero-image2').style.marginBottom = '25px'
		document.getElementById('upload_uploadHero1__text').style.display = 'inline'
		document.getElementById('upload_uploadHero2__text').style.display = 'inline'
		document.getElementById('info__subtitle1').style.display = 'none'
		document.getElementById('info__subtitle2').style.display = 'none'
		document.getElementById('input_hero-image1_block').style.flexDirection = 'row'
		document.getElementById('input_hero-image2_block').style.flexDirection = 'row'
		document.getElementById('delete_HeroImage1').style.display = 'flex'
		document.getElementById('delete_HeroImage2').style.display = 'flex'
		document.getElementById('input_hero-image1_error').style.display = 'none'
		document.getElementById('input_hero-image2_error').style.display = 'none'
	}

	document.getElementById('delete_HeroImage1').addEventListener('click', deleteHero);
	function deleteHero(event) {
		event.preventDefault()
		document.getElementById('input_hero-image1__preview').src = ''
		document.getElementById('input_hero-image1__preview').style.display = 'none'
		document.getElementById('input_hero-image1').style.border = '1px solid rgba(211, 211, 211, 1)'
		document.getElementById('input_hero-image1').style.borderStyle = 'dashed'
		document.getElementById('input_hero-image1').style.justifyContent = 'center'
		document.getElementById('input_hero-image1').style.alignItems = 'center'
		document.getElementById('input_hero-image1').style.width = '560px'
		document.getElementById('input_hero-image1').style.height = '160px'
		document.getElementById('input_hero-image1').style.maxWidth = '560px'
		document.getElementById('input_hero-image1').style.maxHeight = '160px'
		document.getElementById('input_hero-image1').style.backgroundColor = 'rgba(247, 247, 247, 1)'
		document.getElementById('input_hero-image1').style.marginBottom = '5px'
		document.getElementById('input_hero-image2').style.border = '1px solid rgba(211, 211, 211, 1)'
		document.getElementById('input_hero-image2__preview').src = ''
		document.getElementById('input_hero-image2__preview').style.display = 'none'
		document.getElementById('input_hero-image2').style.borderStyle = 'dashed'
		document.getElementById('input_hero-image2').style.justifyContent = 'center'
		document.getElementById('input_hero-image2').style.alignItems = 'center'
		document.getElementById('input_hero-image2').style.width = '296px'
		document.getElementById('input_hero-image2').style.height = '150px'
		document.getElementById('input_hero-image2').style.maxWidth = '296px'
		document.getElementById('input_hero-image2').style.maxHeight = '150px'
		document.getElementById('input_hero-image2').style.backgroundColor = 'rgba(247, 247, 247, 1)'
		document.getElementById('input_hero-image2').style.marginBottom = '5px'
		document.getElementById('upload_uploadHero1__text').style.display = 'none'
		document.getElementById('upload_uploadHero2__text').style.display = 'none'
		document.getElementById('info__subtitle1').style.display = 'block'
		document.getElementById('info__subtitle2').style.display = 'block'
		document.getElementById('input_hero-image1_block').style.flexDirection = 'column'
		document.getElementById('input_hero-image2_block').style.flexDirection = 'column'
		document.getElementById('delete_HeroImage1').style.display = 'none'
		document.getElementById('delete_HeroImage2').style.display = 'none'
		document.querySelector('.card-preview__Hero_Image').style.backgroundImage = ''
		document.querySelector('.preview__Hero_Image').style.backgroundImage = ''
		postData.heroImage = ''
	}

	document.getElementById('delete_HeroImage2').addEventListener('click', deleteHero);
	function deleteHero(event) {
		event.preventDefault()
		document.getElementById('input_hero-image1__preview').src = ''
		document.getElementById('input_hero-image1__preview').style.display = 'none'
		document.getElementById('input_hero-image1').style.border = '1px solid rgba(211, 211, 211, 1)'
		document.getElementById('input_hero-image1').style.borderStyle = 'dashed'
		document.getElementById('input_hero-image1').style.justifyContent = 'center'
		document.getElementById('input_hero-image1').style.alignItems = 'center'
		document.getElementById('input_hero-image1').style.width = '560px'
		document.getElementById('input_hero-image1').style.height = '160px'
		document.getElementById('input_hero-image1').style.maxWidth = '560px'
		document.getElementById('input_hero-image1').style.maxHeight = '160px'
		document.getElementById('input_hero-image1').style.backgroundColor = 'rgba(247, 247, 247, 1)'
		document.getElementById('input_hero-image1').style.marginBottom = '5px'
		document.getElementById('input_hero-image2').style.border = '1px solid rgba(211, 211, 211, 1)'
		document.getElementById('input_hero-image2__preview').src = ''
		document.getElementById('input_hero-image2__preview').style.display = 'none'
		document.getElementById('input_hero-image2').style.borderStyle = 'dashed'
		document.getElementById('input_hero-image2').style.justifyContent = 'center'
		document.getElementById('input_hero-image2').style.alignItems = 'center'
		document.getElementById('input_hero-image2').style.width = '296px'
		document.getElementById('input_hero-image2').style.height = '150px'
		document.getElementById('input_hero-image2').style.maxWidth = '296px'
		document.getElementById('input_hero-image2').style.maxHeight = '150px'
		document.getElementById('input_hero-image2').style.backgroundColor = 'rgba(247, 247, 247, 1)'
		document.getElementById('input_hero-image2').style.marginBottom = '5px'
		document.getElementById('upload_uploadHero1__text').style.display = 'none'
		document.getElementById('upload_uploadHero2__text').style.display = 'none'
		document.getElementById('info__subtitle1').style.display = 'block'
		document.getElementById('info__subtitle2').style.display = 'block'
		document.getElementById('input_hero-image1_block').style.flexDirection = 'column'
		document.getElementById('input_hero-image2_block').style.flexDirection = 'column'
		document.getElementById('delete_HeroImage1').style.display = 'none'
		document.getElementById('delete_HeroImage2').style.display = 'none'
		document.querySelector('.card-preview__Hero_Image').style.backgroundImage = ''
		document.querySelector('.preview__Hero_Image').style.backgroundImage = ''
		postData.heroImage = ''
	}

	var space_title = document.getElementById('title_input');

	space_title.oninput = () => {
		if (space_title.value.charAt(0) === ' ') {
			space_title.value = '';
			postData.title = '';
		}
	}

	var space_shortDescription = document.getElementById('Short_description');

	space_shortDescription.oninput = () => {
		if (space_shortDescription.value.charAt(0) === ' ') {
			space_shortDescription.value = '';
			postData.shortDescription = '';
		}
	}

	var space_authorName = document.getElementById('Author_name');

	space_authorName.oninput = () => {
		if (space_authorName.value.charAt(0) === ' ') {
			space_authorName.value = '';
			postData.authorName = '';
		}
	}

	var space_content = document.getElementById('input_content');

	space_content.oninput = () => {
		if (space_content.value.charAt(0) === ' ') {
			space_content.value = '';
			postData.content = '';
		}
	}


});

