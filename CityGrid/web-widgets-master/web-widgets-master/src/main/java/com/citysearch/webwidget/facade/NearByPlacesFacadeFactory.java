package com.citysearch.webwidget.facade;

import com.citysearch.webwidget.exception.CitysearchException;
import com.citysearch.webwidget.util.CommonConstants;

public class NearByPlacesFacadeFactory {

    public static AbstractNearByPlacesFacade getFacade(String publisher, String contextPath,
            int displaySize) throws CitysearchException {
        if (publisher == null) {
            throw new CitysearchException("NearByPlacesFacadeFactory", "getFacade",
                    "Invalid Publisher Code.");
        } else if (publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_INSIDERPAGES)) {
            return new InsiderPagesNearByPlacesFacade(contextPath, displaySize);
        } else if (publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_PROJECT_YELLOW)
                || publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_CITYSEARCH)
                || publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_URBANSPOON)) {
            return new ConquestNearByPlacesFacade(contextPath, displaySize);
        } else if (publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_URBANSPOON)
                && displaySize == 3) {
            return new InsiderPagesNearByPlacesFacade(contextPath, displaySize);
        } else if (publisher.equalsIgnoreCase(CommonConstants.PUBLISHER_CBS)) {
            return new CBSNearbyPlacesFacade(contextPath, displaySize);
        }
        return null;
    }
}
