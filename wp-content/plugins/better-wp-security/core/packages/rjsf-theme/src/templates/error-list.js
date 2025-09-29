/**
 * Internal dependencies
 */
import { ErrorList as Wrapped } from '@ithemes/security-components';

export default function ErrorListTemplate( { errors } ) {
	return (
		<Wrapped
			errors={ errors
				.map( ( { stack } = {} ) => stack )
				.filter( ( error ) => !! error ) }
		/>
	);
}
