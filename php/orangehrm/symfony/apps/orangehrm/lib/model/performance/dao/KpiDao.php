<?php
/* 
 * 
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 * 
 */

/**
 * Kpi Dao class 
 *
 * @author Samantha Jayasinghe
 */
class KpiDao extends BaseDao {
	
	
	/**
	 * Save Kpi
	 * 
	 * @param DefineKpi $Kpi
	 * @return DefineKpi
	 */
	public function saveKpi(DefineKpi $Kpi) {
		try {
			if( $Kpi->getId() == ''){
				$idGenService = new IDGeneratorService ( );
				$idGenService->setEntity ( $Kpi );
				$Kpi->setId ( $idGenService->getNextID () );
			}
			$Kpi->save ();
			
			return $Kpi;
		} catch ( Exception $e ) {
			throw new DaoException ( $e->getMessage () );
		}
	}
	
	/**
	 * Read kpi 
	 * @param $defineKpiId
	 * @return DefineKpi Array
	 */
	public function readKpi($defineKpiId){
		try {
			$defineKpis = Doctrine::getTable ( 'DefineKpi' )
			->find ( $defineKpiId );
			return $defineKpis;
		} catch ( Exception $e ) {
			throw new PerformanceServiceException ( $e->getMessage () );
		}
	}
	
	/**
     * Get Kpi for Job Title
     * 
     * @param int $jobTitleId
     * @return DefineKpi KpiList
     */
    public function getKpiForJobTitle( $jobTitleId ){
    	try{
	    	
        	$q = Doctrine_Query::create( )
				    ->from('DefineKpi kpi') 
				    ->where("kpi.job_title_code='".$jobTitleId."' AND kpi.is_active = '1'" );
				    
			$kpiList = $q->execute();
			
			return $kpiList;
			   
        }catch( Exception $e){
            throw new DaoException($e->getMessage());
        }
    }
}