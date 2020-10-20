<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeComponent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:component {componentName} {--type=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate angularjs component';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $componentName = $this->argument('componentName');

        $path = 'resources/js/components/' . $componentName;

        if (file_exists($path)) {
            $this->error('Component already exists');
            return;
        }

        mkdir($path);

        $html = fopen($path . '/' . $componentName . '.html', 'w');
        fwrite($html, $this->getTemplateContent());
        fclose($html);

        $js = fopen($path . '/' . $componentName . '.js', 'w');
        fwrite($js, $this->getControllerContent($componentName));
        fclose($js);

        $this->addToApp($componentName);

        $this->info('component success created');
    }

    private function getCamelCaseName($componentName)
    {
        $r = str_replace(
            ' ',
            '',
            ucwords(str_replace('-', ' ', $componentName))
        );

        $r[0] = strtolower($r[0]);

        return $r;
    }

    private function getTemplateContent()
    {
        if ($this->option('type') == 'modal') {
            return '
<div class="modal-header">
    <h5 class="modal-title">Modal title</h5>
    <button type="button" class="close" ng-click="$ctrl.dismiss()">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Modal body text goes here.</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" ng-click="$ctrl.dismiss()">Close</button>
    <button type="button" class="btn btn-primary" ng-click="$ctrl.saves()">Save changes</button>
 </div>';
        } else {
            return '';
        }
    }

    private function getControllerContent($componentName)
    {
        $camelCaseName = $this->getCamelCaseName($componentName);

        if ($this->option('type') == 'modal') {
            return 'import angular from "angular";

angular
    .module(\'app\')
    .component(\''. $camelCaseName . '\', {
        template: require(\'./' . $componentName . '.html\'),
        controller: [controller],
        bindings: {
            resolve: \'<\',
            close: \'&\',
            dismiss: \'&\'
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        //
    };
}';
        } else {
            return 'import angular from "angular";

angular
    .module(\'app\')
    .component(\''. $camelCaseName . '\', {
        template: require(\'./' . $componentName . '.html\'),
        controller: [controller],
        bindings: {
            //
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        //
    };
}';
        }
    }

    private function addToApp($componentName)
    {
        $f = fopen('resources/js/app.js', 'a');
        fwrite($f, PHP_EOL . 'require(\'./components/' . $componentName . '/' . $componentName . '\');');
    }

}
