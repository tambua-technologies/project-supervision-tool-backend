<?php
/**
 * @SWG\SecurityScheme(
 *   securityDefinition="Bearer",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization",
 * )
 *
 */



/**
 * @SWG\Definition(
 *      definition="GeoJSON",
 *      @SWG\Property(
 *          property="geometry",
 *          description="geometry",
 *          type="object",
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="coordinates",
 *          description="coordinates",
 *          type="array",
 *          @SWG\Items(type="integer")
 *      )
 *      )
 * )
 */



/**
 * @SWG\Definition(
 *      definition="Shapefiles",
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * )
 */



/**
 * @SWG\Definition(
 *      definition="Role",
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="AssignRolePermision",
 *      @SWG\Property(
 *          property="role",
 *          description="role",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="permission",
 *          description="permission",
 *          type="string"
 *      ),
 * )
 */



/**
 * @SWG\Definition(
 *      definition="Permission",
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 * )
 */
