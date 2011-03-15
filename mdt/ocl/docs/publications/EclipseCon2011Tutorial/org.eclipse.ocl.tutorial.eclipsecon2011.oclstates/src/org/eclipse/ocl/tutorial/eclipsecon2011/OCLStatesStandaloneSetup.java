/**
 * <copyright>
 *
 * Copyright (c) 2011 E.D.Willink and others.
 * All rights reserved.   This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *   E.D.Willink - Initial API and implementation
 *
 * </copyright>
 *
 * $Id: OCLStatesStandaloneSetup.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011;

/**
 * Initialization support for running Xtext languages 
 * without equinox extension registry
 */
public class OCLStatesStandaloneSetup extends OCLStatesStandaloneSetupGenerated{

	public static void doSetup() {
		new OCLStatesStandaloneSetup().createInjectorAndDoEMFRegistration();
	}
}

