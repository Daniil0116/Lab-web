document.addEventListener("DOMContentLoaded", () => {
	const postData =
	{
		title: 'New Post',
		subtitle: 'Please, enter any description',
		author: 'Enter author name',
		author_url: '',
		publish_date: 'гггг-мм-дд',
		image_url: '',
		content: '',
		featured: '0'
	}

	const titleInput = document.getElementById('title_input');
	const subtitle = document.getElementById('Short_description');
	const author = document.getElementById('Author_name');
	const author_url = document.getElementById('Author_Photo');
	const publish_date = document.getElementById('Publish_Date');
	const image_url = document.getElementById('Hero_Image');
	const content = document.getElementById('input_content');

	function onTitleInputChange(event) {
		postData.title = event.target.value;
		invalidatePostPreview()
	}
	function onsubtitleChange(event) {
		postData.subtitle = event.target.value;
		invalidatePostPreview()
	}
	function onauthorChange(event) {
		postData.author = event.target.value;
		invalidatePostPreview()
	}
	function onauthor_urlChange(event) {
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.author_url = result;
			invalidatePostPreview()
		});
	}
	function onpublish_dateChange(event) {
		postData.publish_date = event.target.value;
		invalidatePostPreview()
	}
	function onimage_urlInputChange(event) {
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.image_url = result;
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
		subtitle.addEventListener('input', onsubtitleChange);
		author.addEventListener('input', onauthorChange);
		author_url.addEventListener('change', onauthor_urlChange);
		publish_date.addEventListener('input', onpublish_dateChange);
		image_url.addEventListener('change', onimage_urlInputChange);
		content.addEventListener('input', onContent);
	}

	function invalidatePostPreview() {
		const postPreviewTitle = document.querySelector('.preview__title')
		postPreviewTitle.innerText = postData.title;

		const cardPreviewTitle = document.querySelector('.main-info__title')
		cardPreviewTitle.innerText = postData.title;

		const cardPreviewsubtitle = document.querySelector('.main-info__Short_description')
		cardPreviewsubtitle.innerText = postData.subtitle;

		const postPreviewsubtitle = document.querySelector('.preview__Short_description')
		postPreviewsubtitle.innerText = postData.subtitle;

		const postPreviewauthor = document.querySelector('.author__Author_name')
		postPreviewauthor.innerText = postData.author;

		const postPreviewauthor_url = document.querySelector('.author__Author_Photo')
		postPreviewauthor_url.style.backgroundImage = `url(${postData.author_url})`;

		const postPreviewpublish_date = document.querySelector('.block_author-data__Publish_Date')
		postPreviewpublish_date.innerText = postData.publish_date;

		const postPreviewimage_url = document.querySelector('.preview__Hero_Image')
		postPreviewimage_url.style.backgroundImage = `url(${postData.image_url})`

		const cardPreviewimage_url = document.querySelector('.card-preview__Hero_Image')
		cardPreviewimage_url.style.backgroundImage = `url(${postData.image_url})`
	}


	initEventListener();

	document.getElementById('add_post').addEventListener('submit', InputError);

	function InputError(event) {
		event.preventDefault()

		var fail_title = true;
		var fail_subtitle = true;
		var fail_author = true;
		var fail_author_url = true;
		var fail_publish_date = true;
		var fail_image_url = true;
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

		if (postData.subtitle == '' || postData.subtitle == 'Please, enter any description') {
			fail_subtitle = true;
			document.getElementById('Short_description_error').innerHTML = 'Short description is required.';
			document.getElementById('Short_description').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_subtitle = false;
			document.getElementById('Short_description_error').innerHTML = '';
			document.getElementById('Short_description').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.author == '' || postData.author == 'Enter author name') {
			fail_author = true;
			document.getElementById('Author_name_error').innerHTML = 'Author name is required.';
			document.getElementById('Author_name').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_author = false;
			document.getElementById('Author_name_error').innerHTML = '';
			document.getElementById('Author_name').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.author_url == '') {
			fail_author_url = true;
			document.getElementById('Author_Photo_error').style.display = 'block';
			document.getElementById('Author_Photo_error').innerHTML = 'Author photo is required.';
			document.getElementById('input_author-photo').style.borderColor = 'rgba(232, 105, 97, 1)';
			document.getElementById('author-photo').style.marginBottom = '5px';
		} else {
			fail_author_url = false;
			document.getElementById('Author_Photo_error').innerHTML = '';
			document.getElementById('input_author-photo').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (postData.publish_date == '' || postData.publish_date == 'гггг-мм-дд') {
			fail_publish_date = true;
			document.getElementById('Publish_Date_error').innerHTML = 'Publish date is required.';
			document.getElementById('Publish_Date').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_publish_date = false;
			document.getElementById('Publish_Date_error').innerHTML = '';
			document.getElementById('Publish_Date').style.borderColor = 'rgba(46, 46, 46, 1)';
		}

		if (postData.image_url == '') {
			fail_image_url = true;
			document.getElementById('input_hero-image1_error').style.display = 'block';
			document.getElementById('input_hero-image1_error').innerHTML = 'Hero image is required.';
			document.getElementById('input_hero-image1').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_image_url = false;
			document.getElementById('input_hero-image1_error').innerHTML = '';
			document.getElementById('input_hero-image1').style.borderColor = 'rgba(211, 211, 211, 1)';
		}

		if (postData.image_url == '') {
			fail_image_url = true;
			document.getElementById('input_hero-image2_error').style.display = 'block';
			document.getElementById('input_hero-image2_error').innerHTML = 'Hero image is required.';
			document.getElementById('input_hero-image2').style.borderColor = 'rgba(232, 105, 97, 1)';
		} else {
			fail_image_url = false;
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

		if (fail_title == true || fail_subtitle == true || fail_author == true || fail_author_url == true || fail_publish_date == true || fail_image_url == true || fail_content == true) {
			document.getElementById('publish_message-error').style.display = 'flex';
			document.getElementById('publish_message-complete').style.display = 'none';
		} else {
			document.getElementById('publish_message-error').style.display = 'none';
			document.getElementById('publish_message-complete').style.display = 'flex';
			console.log(postData.title)
			console.log(postData.subtitle)
			console.log(postData.author)
			console.log(postData.author_url)
			console.log(postData.publish_date)
			console.log(postData.image_url)
			console.log(postData.content)
			let response = fetch('http://localhost:8001/api.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json;charset=uft-8'
				},
				body: JSON.stringify(postData)
			})

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
		postData.author_url = '';
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
		postData.image_url = ''
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
		postData.image_url = ''
	}

	var space_title = document.getElementById('title_input');

	space_title.oninput = () => {
		if (space_title.value.charAt(0) === ' ') {
			space_title.value = '';
			postData.title = '';
		}
	}

	var space_subtitle = document.getElementById('Short_description');

	space_subtitle.oninput = () => {
		if (space_subtitle.value.charAt(0) === ' ') {
			space_subtitle.value = '';
			postData.subtitle = '';
		}
	}

	var space_author = document.getElementById('Author_name');

	space_author.oninput = () => {
		if (space_author.value.charAt(0) === ' ') {
			space_author.value = '';
			postData.author = '';
		}
	}

	var space_content = document.getElementById('input_content');

	space_content.oninput = () => {
		if (space_content.value.charAt(0) === ' ') {
			space_content.value = '';
			postData.content = '';
		}
	}

	document.getElementById('exit-button').addEventListener('click', function(event){
        event.preventDefault()
        fetch('http://localhost:8001/logout.php')
        .then(response => {
            if(response.ok){
                window.location.href = 'http://localhost:8001/home'
            }
        })
    })

});

