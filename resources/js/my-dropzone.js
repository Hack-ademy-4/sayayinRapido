import { $ } from "./app.js";
import Dropzone from "dropzone";
import axios from "axios";

Dropzone.autoDiscover = false;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export function init(token)
{
	const user_token = $("input[name='user_token'").value;
	let myDropzone = new Dropzone('#drophere', {
					url: '/new/images',
					params: {
						_token: token,
						user_token
					},
					addRemoveLinks: true,
					init: onInit
			});

	myDropzone.on("success", onUpload);
	myDropzone.on("removedfile", onDelete);
}

function onInit()
{
	const user_token = $("input[name='user_token'").value;
	axios.get(`/view/images?${user_token}`).then(({data}) => {
		console.log(data);
		data.forEach(image => {
			const file = {
				serverId: image.id,
				name: image.name,
				size: image.size,
			};
			
			this.options.addedfile.call(this,file)
			this.options.thumbnail.call(this,file,image.src)
			this.options.success.call(this,file)
			this.options.complete.call(this,file)
		});
	});
}

function onUpload(file, r)
{
	file.serverId = r.id;
}

function onDelete(file)
{
	const user_token = $("input[name='user_token'").value;
	axios({
		method: 'delete',
		url: '/remove/images',
		data: {
			user_token,
			id: file.serverId
		}
	});
}