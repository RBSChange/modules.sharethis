<?php
/**
 * @package modules.sharethis
 * @method sharethis_GroupService getInstance()
 */
class sharethis_GroupService extends f_persistentdocument_DocumentService
{
	/**
	 * @return sharethis_persistentdocument_group
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/group');
	}

	/**
	 * Create a query based on 'modules_sharethis/group' model.
	 * Return document that are instance of modules_sharethis/group,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/group');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/group' model.
	 * Only documents that are strictly instance of modules_sharethis/group
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/group', false);
	}
	
	/**
	 * @param string $code
	 * @return sharethis_persistentdocument_group
	 */
	public function getByCode($code)
	{
		return $this->createQuery()->add(Restrictions::eq('code', $code))->findUnique();		
	}
}