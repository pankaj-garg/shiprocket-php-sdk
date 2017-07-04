<?php
namespace Shiprocket;


use Shiprocket\Provider\IProvider;


/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * @package Shiprocket
 */
abstract class AbstractRequest
{
	/* @var IProvider */
	protected $Provider;

	/* @var int */
	protected $lastPage = 1;

	/* @var int */
	protected $limit = 15;

	/* @var string */
	protected $sort;

	/* @var string */
	protected $sortBy;

	/* @var string */
	protected $fromDate;

	/* @var string */
	protected $toDate;

	/* @var string */
	protected $fromFilter;

	/* @var string */
	protected $filter_by;

	/* @var string */
	protected $searchString;

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param IProvider $Provider
	 */
	public function __construct(IProvider $Provider)
	{
		$this->Provider = $Provider;
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <OrderObject>
	 */
	public function nextPage()
	{
		++$this->lastPage;

		return $this->getAll();
	}

	protected function buildParameters()
	{
		$parameters             = [];
		$parameters['page']     = $this->lastPage;
		$parameters['per_page'] = $this->getLimit();

		if (!empty($this->sort)) {
			$parameters['sort'] = $this->getSort();
		}

		if (!empty($this->sortBy)) {
			$parameters['sort_by'] = $this->getSortBy();
		}

		if (!empty($this->toDate)) {
			$parameters['to'] = $this->getToDate();
		}

		if (!empty($this->fromDate)) {
			$parameters['from'] = $this->getFromDate();
		}

		if (!empty($this->fromFilter)) {
			$parameters['from_filter'] = $this->getFromFilter();
		}

		if (!empty($this->filter_by)) {
			$parameters['filter_by'] = $this->getFilterBy();
		}

		if (!empty($this->searchString)) {
			$parameters['search'] = $this->getSearchString();
		}

		return $parameters;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return IProvider
	 */
	public function getProvider()
	{
		return $this->Provider;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param IProvider $Provider
	 *
	 * @return self
	 */
	protected function setProvider($Provider)
	{
		$this->Provider = $Provider;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return int
	 */
	public function getLimit()
	{
		return $this->limit;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param int $limit
	 *
	 * @return self
	 */
	protected function setLimit($limit)
	{
		$this->limit = $limit;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getSort()
	{
		return $this->sort;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $sort
	 *
	 * @return self
	 */
	protected function setSort($sort)
	{
		$this->sort = $sort;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getSortBy()
	{
		return $this->sortBy;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $sortBy
	 *
	 * @return self
	 */
	protected function setSortBy($sortBy)
	{
		$this->sortBy = $sortBy;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getFromDate()
	{
		return $this->fromDate;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $fromDate
	 *
	 * @return self
	 */
	protected function setFromDate($fromDate)
	{
		$this->fromDate = $fromDate;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getToDate()
	{
		return $this->toDate;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $toDate
	 *
	 * @return self
	 */
	protected function setToDate($toDate)
	{
		$this->toDate = $toDate;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getFromFilter()
	{
		return $this->fromFilter;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $fromFilter
	 *
	 * @return self
	 */
	protected function setFromFilter($fromFilter)
	{
		$this->fromFilter = $fromFilter;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getFilterBy()
	{
		return $this->filter_by;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $filter_by
	 *
	 * @return self
	 */
	protected function setFilterBy($filter_by)
	{
		$this->filter_by = $filter_by;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getSearchString()
	{
		return $this->searchString;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $searchString
	 *
	 * @return self
	 */
	protected function setSearchString($searchString)
	{
		$this->searchString = $searchString;

		return $this;
	}
}