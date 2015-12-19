<?

namespace Core\Actions;

abstract class AjaxAction extends Action implements \JsonSerializable
{
	public final function jsonSerialize()
	{
		return array(
			'success' => $this->isSuccessful(),
			'results' => $this->getResults(),
			'errors'  => $this->getErrors(),
		);
	}

}