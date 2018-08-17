<?php
namespace X\Module\Cmd;
use X\Core\Module\XModule;
use X\Service\XAction\Service as XActionService;
/**
 * 接口模块
 * @author Michael Luthor <michaelluthor@163.com>
 */
class Module extends XModule {
    /**
     * {@inheritDoc}
     * @see \X\Core\Module\XModule::run()
     */
    public function run($parameters = array()) {
        $actionService = XActionService::getService();
        
        $namespace = get_class($this);
        $namespace = substr($namespace, 0, strrpos($namespace, '\\'));
        $group = $this->getName();
        $actionService->addGroup($group, $namespace.'\\Action');
        $actionService->setGroupOption($group, 'defaultAction', 'index');
        $actionService->setGroupOption($group, 'viewPath', $this->getPath('View/'));
        $actionService->getParameterManager()->merge($parameters);
        return $actionService->runGroup($group);
    }
}