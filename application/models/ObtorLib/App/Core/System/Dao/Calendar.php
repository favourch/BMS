<?php

/**
 * Description of Calendar
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Dao_Calendar extends Zend_Db_Table_Abstract {

    //put your code here
    public $calendar;
    protected $_name = 'tbl_calendar';

    /*
     * Get a calendar details using calendar id
     * @return      : Entity Calendar Object (Base_Model_ObtorLib_App_Core_System_Entity_Calendar)
     */

    public function getCalendar($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $calendar = $row->toArray();
                $calendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
                $calendarEntity->setId($calendar['id']);
                $calendarEntity->setTitle($calendar['title']);
                $calendarEntity->setAllDay($calendar['allDay']);
                $calendarEntity->setTitleCategory($calendar['title_category']);
                $calendarEntity->setStartDate($calendar['start']);
                $calendarEntity->setEndDate($calendar['end']);
                $calendarEntity->setAddedOn($calendar['added_on']);
                $calendarEntity->setAddedBy($calendar['added_by']);
                $calendarEntity->setUpdatedOn($calendar['updated_on']);
                $calendarEntity->setUpdatedBy($calendar['updated_by']);
                return $calendarEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Add system calendar information
     * @return      : Integer ID / Null
     */

    public function addCalendar() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $data = array('title' => $this->calendar->getTitle(),
                    'title_category' => $this->calendar->getTitleCategory(),
                    'start' => $this->calendar->getStartDate(),
                    'allDay'=> $this->calendar->getAllDay(),
                    'end' => $this->calendar->getEndDate(),
                    'added_on' => $this->calendar->getAddedOn(),
                    'added_by' => $this->calendar->getAddedBy(),
                    'updated_on' => $this->calendar->getUpdatedOn(),
                    'updated_by' => $this->calendar->getUpdatedBy());

                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Update system calendar information
     * @return      : Boolean true/false
     */

    public function updateCalendar() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $data = array('title' => $this->calendar->getTitle(),
                    'updated_on' => $this->calendar->getUpdatedOn(),
                    'updated_by' => $this->calendar->getUpdatedBy());
                return $this->update($data, 'id = ' . (int) $this->calendar->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
        /*
     * Delete category
     * @return      : Integer ID / Null
     */

    public function deleteEvent() {
        try {
           if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->calendar->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search system calendar information ....
     * @return : Array of System Calendar Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $arrWhere = array();
                $arrCalendars = array();
                $startDate = $this->calendar->getStartDate();
                $endDate = $this->calendar->getEndDate();


                $systemCalendarSql = "SELECT id FROM tbl_calendar ";

                if ($startDate) {
                    array_push($arrWhere, "start = '" . $startDate . "'");
                }

                if ($endDate) {
                    array_push($arrWhere, "end = '" . $endDate . "'");
                }



                if (count($arrWhere) > 0) {
                    $systemCalendarSql.= "WHERE " . implode(' AND ', $arrWhere);
                }

                if (!is_null($limit)) {
                    $systemCalendarSql = $systemCalendarSql;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($systemCalendarSql);
                foreach ($result as $calendarId) {
                    $calendarInfo = $this->getCalendar($calendarId);
                    array_push($arrCalendars, $calendarInfo);
                }
                return $arrCalendars;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    /*
     * Update system calendar information
     * @return      : Boolean true/false
     */

    public function updateCalendarDate() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $data = array('start' => $this->calendar->getStartDate(),
                    'end' => $this->calendar->getEndDate());
                return $this->update($data, 'id = ' . (int) $this->calendar->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

}