package com.defecttracking.common.controller;

import java.io.IOException;
import java.util.List;

import javax.servlet.ServletException;


import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.Controller;

import com.defecttracking.defect.bean.QueryFilter;
import com.defecttracking.defect.service.DefectManager;



public class HomeController implements Controller {

	// create a method to open the home page when the session is not null

	private DefectManager defectManager;
	
	
	public void setDefectManager(DefectManager defectManager) {
		this.defectManager = defectManager;
	}


	public ModelAndView handleRequest(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		ModelAndView modelAndView = new ModelAndView();
		HttpSession session = request.getSession();
		String filterName=null;
		String filterValue=null;
		String userId=(String)session.getAttribute("uid");
		String queryId=request.getParameter("queryId");
		
		if(userId!=null)
		{		
		modelAndView.setViewName("home");
		}
		else
		{
			modelAndView.setViewName("index");
		}	
		
		//System.out.println("QueryId "+queryId);
		/*if(queryId!=null)
		{
		List filterList=defectManager.getFilterListByQueryId(queryId);
		System.out.println("Size "+filterList.size());
		for(int i=0; i<filterList.size();i++)
		{
			QueryFilter queryFilter=(QueryFilter)filterList.get(i);
			System.out.println("Filter Name "+queryFilter.getFilterName());
			System.out.println("Filter Value "+queryFilter.getDefaultValue());
			filterName=queryFilter.getFilterName();
			filterValue=queryFilter.getDefaultValue();
			List defectList=defectManager.getDefectListByFilter(userId, filterName, filterValue);
			modelAndView.addObject("defectList", defectList);
		}
		}
		if(userId!=null)
		{
		List personalQueryList=defectManager.getQueryListbyQueryType("Personal",userId);
		modelAndView.addObject("personalQueryList", personalQueryList);
		
		//List defectList=defectManager.getDefectListByUserId(userId);
		modelAndView.setViewName("home");
		}
		else
		{
			modelAndView.setViewName("index");
		}
		List publicQueryList=defectManager.getQueryListbyQueryType("Public",userId);
		modelAndView.addObject("publicQueryList", publicQueryList);
		
		*/
		
		return modelAndView;

	}

}
