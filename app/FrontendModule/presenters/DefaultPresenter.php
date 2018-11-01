<?php
namespace FrontModule;

use Nette\Application\BadRequestException;
use Nette\Security\AuthenticationException;

class DefaultPresenter extends BasePresenter {

	public function actionLogout() {
		$this->user->logout(TRUE);
		$this->redirect("default");
	}

	public function renderChat() {
		$this->getComponent("chat")->setSource(\Interlos::chat()->findAll());
		$this->setPageTitle("Diskuse");
	}

	public function renderDefault() {
		$this->setPagetitle("INTERnetová LOgická Soutěž");
	}

	public function renderLastYears() {
		$this->setPagetitle("Minulé ročníky");
	}

	public function renderLogin() {
		$this->setPagetitle("Přihlásit se");
	}

	// ----- PROTECTED METHODS

	protected function createComponentChat($name) {
		$chat = new \ChatListComponent();
		return $chat;
	}

	protected function createComponentLogin($name) {
		return new \LoginFormComponent();
	}

}
