<?php
class marker_groupsControllerGmp extends controllerGmp {
	/**
	 * @see controller::getPermissions();
	 */
	protected function _prepareTextLikeSearch($val) {
		$query = '(title LIKE "%'. $val. '%"';
		if(is_numeric($val)) {
			$query .= ' OR id LIKE "%'. (int) $val. '%"';
		}
		$query .= ')';
		return $query;
	}
	protected function _prepareSortOrder($orderBy) {
		if(!$orderBy)
			$orderBy = 'sort_order';
		return $orderBy;
	}
	protected function _prepareListForTbl($data) {
		if (!empty($data)) {
			$markerGroupsIds = array();
			$parents = array();
			foreach($data as $i => $v) {
				// Save Markers Groups sort order
				$markerGroupsIds[] = $data[$i]['id'];

				// Marker Group Parent Title
				if(!empty($data[$i]['parent'])) {
					if(!isset($parents [$data[$i]['parent']])) {
						$parentGroup = $this->getModel()->getById($data[$i]['parent']);
						$parents [$data[$i]['parent']] = $parentGroup['title'];
					}
					$data[$i]['parent'] = $parents [$data[$i]['parent']];
				}

				// Actions
				$actions = $this->getView()->getListOperations($v);
				$data[$i]['actions'] = preg_replace('/\s\s+/', ' ', trim($actions));
			}
			$this->getModel()->resortMarkersGroups($markerGroupsIds);
		}
		return $data;
	}
	public function save() {
		$saveRes = false;
		$data = reqGmp::get('post');
		$res = new responseGmp();
		$markerGroupId = 0;
		$edit = true;
		if(!isset($data['marker_group'])) {
			$res->pushError(__('Marker Category data not found', GMP_LANG_CODE));
			return $res->ajaxExec();
		}
		if(isset($data['marker_group']['id']) && !empty($data['marker_group']['id'])) {
			$saveRes = $this->getModel()->updateMarkerGroup($data['marker_group']);
			$markerGroupId = $data['marker_group']['id'];
		} else {
			$saveRes = $this->getModel()->saveNewMarkerGroup($data['marker_group']);
			$markerGroupId = $saveRes;
			$edit = false;
		}
		if($saveRes) {
			$res->addData('marker_group_id', $markerGroupId);
			$res->addData('marker_group', $this->getModel()->getMarkerGroupById( $markerGroupId ));
			if(!$edit) {	// For new marker category
				$fullEditUrl = $this->getModule()->getEditMarkerGroupLink( $markerGroupId );
				$editUrlParts = explode('/', $fullEditUrl);
				$res->addData('edit_url', $editUrlParts[ count($editUrlParts) - 1 ]);
			}
		} else {
			$res->pushError( $this->getModel()->getErrors() );
		}
		return $res->ajaxExec();
	}
	public function remove() {
		$res = new responseGmp();
		if($this->getModel()->remove(reqGmp::getVar('id', 'post'))) {
			$res->addMessage(__('Done', GMP_LANG_CODE));
		} else
			$res->pushError($this->getModel()->getErrors());
		$res->ajaxExec();
	}
	public function resortMarkersGroups() {
		$res = new responseGmp();
		$postData = reqGmp::get('post');
		if(!$this->getModel()->resortMarkersGroups($postData['ids'])) {
			$res->pushError( $this->getModel()->getErrors() );
		}
		return $res->ajaxExec();
	}
	public function getPermissions() {
		return array(
			GMP_USERLEVELS => array(
				GMP_ADMIN => array('getAllMarkerGroups', 'save', 'remove')
			),
		);
	}
}