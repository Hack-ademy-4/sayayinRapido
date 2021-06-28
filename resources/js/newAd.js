import { $ } from "./app.js";
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

export function init(token)
{
	const user_token = $("input[name='user_token'").value;
	let myDropzone = new Dropzone('#drop', {
					url: '/new/images',
					params: {
						_token: token,
						user_token
					}
			});
}