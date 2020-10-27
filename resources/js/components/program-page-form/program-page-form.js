import angular from "angular";
import buildConstructor from "../../webBuilderUtil/grapejsBuilder";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: [controller],
        bindings: {
            program: '<',
        }
    });
    
function controller() {
 
	let $ctrl = this;

	let editor;

	$ctrl.$onInit = function () {
        editor = buildConstructor('gjsProgramPassport');
        console.log(editor);
    };

	$ctrl.test = () => {
        $ctrl.passportHtml = `
                <html>
                    <head>
                        <link rel="stylesheet" href="/css/style.css">
                    </head>
                    <body>
                        ${editor.getHtml()}
                    </body>
                </html>
            `;
        let iframe = document.getElementById('passportResult');
        iframe.contentWindow.document.open('text/htmlreplace');
        iframe.contentWindow.document.write($ctrl.passportHtml);
        iframe.contentWindow.document.close();
    };
}