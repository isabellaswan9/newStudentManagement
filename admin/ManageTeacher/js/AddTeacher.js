import { loadXMLDoc } from './loadXMLDoc.js'

function AddTeacher() {
    const myForm = document.getElementById("myForm");
	const formdata=new FormData(myForm);
    loadXMLDoc(formdata, "./AddTea1.php", function () {
        
    });
}
export default AddTeacher
