<?php
namespace Drahak\Restful\Application\Responses;

use Drahak\Restful\Mapping\IMapper;
use Nette\Http;

/**
 * DataUrlResponse
 * @package Drahak\Restful\Application\Responses
 * @author Drahomír Hanák
 */
class DataUrlResponse extends BaseResponse
{

	/**
	 * @param string|null $data
	 * @param IMapper $mapper
	 * @param string|null $contentType
	 */
	public function __construct($data, IMapper $mapper, $contentType = NULL)
	{
		parent::__construct($mapper, $contentType);
		$this->data = $data;
	}

	/**
	 * Sends response to output
	 * @param Http\IRequest $httpRequest
	 * @param Http\IResponse $httpResponse
	 */
	public function send(Http\IRequest $httpRequest, Http\IResponse $httpResponse)
	{
		$httpResponse->setContentType($this->contentType ? $this->contentType : 'text/plain');
		echo $this->mapper->stringify($this->data);
	}


}
