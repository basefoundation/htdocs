package com.defecttracking.project.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.SimpleFormController;

import com.defecttracking.common.helper.ControllerHelper;
import com.defecttracking.project.service.ProjectManager;


/**
 * Class Name: DeleteUserController
 * ********************************************************************************
 * Class Description : This class is used to delete a user details 
 * ******************************************************************************** *
 * Creation Date : 22/8/2010
 * ******************************************************************************** *
 * 
 * @author Sudipta Bera
* *********************************************************************************
 * Name 		Date			 Defect/CR 					Description
 * ********************************************************************************
 * 
 * 
 */

public class DeleteProjectController extends SimpleFormController{
	

	/**
	 * Create a method to delete a selected user page
	 * ******************************
	 * 
	 * @param HttpServletRequest	
	 * @param HttpServletResponse 
	 * @throws Exception
	 * @return ModelAndView
	 */
	
	private ProjectManager projectManager;
	
	public ModelAndView handleRequest(HttpServletRequest request,
			HttpServletResponse response) throws Exception {
		ModelAndView modelAndView = new ModelAndView();	
		HttpSession session=request.getSession();
		String userid=(String)session.getAttribute("uid");
		String prjd=(String)request.getParameter("prjid");		
		if(userid!=null)
		{
				int l = prjd.length();
				char c = prjd.charAt(l - 1);
				if (c == ' ') {
					String[] projectId = prjd.split(" ");
					if (null != projectId) {
						for (int i = 0; i < projectId.length; i++) {
							projectManager.deleteProject(projectId[i]);							
						}
					}
				} else {
					projectManager.deleteProject(prjd);
				}
			
						
			String pageIndx=(String)request.getParameter("pageIndx");
			if(pageIndx==null)
			{
				pageIndx="1";
			}
			List projectList=projectManager.getProjectList();
			modelAndView.setViewName("viewProject");
			modelAndView.addObject("projectList", projectList);
			ControllerHelper.setPagingVar(pageIndx, modelAndView, projectList);
		}
		else
		{
			modelAndView.setViewName("index");
		}
		return modelAndView;
	}

	

	/**
	 * Create a method setter method of ProjectManager class
	 * ****************************** * 
	 * @param object of the ProjectManager class	
	 * @return no return
	 */

	public void setProjectManager(ProjectManager projectManager) {
		this.projectManager = projectManager;
	}


}
